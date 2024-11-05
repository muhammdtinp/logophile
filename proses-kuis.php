<?php
include("dbconn/dbconn.php");
session_start();

if (!isset($_SESSION['id_siswa'])) {
    header("Location: index.php");
    exit();
}

$id_siswa = $_SESSION['id_siswa'];
$id_kuis = $_POST['idkuis'];

// Fetch quiz questions
$sql = "SELECT * FROM kuis WHERE id_kategori = ?";
$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("Preparation failed: " . $conn->error);
}

$stmt->bind_param("i", $id_kuis);
$stmt->execute();
$result = $stmt->get_result();

$questions = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $questions[] = $row;
    }
} else {
    echo "Tidak ada pertanyaan yang ditemukan";
    exit();
}

$total_score = 0;
$total_questions = count($questions);

if ($total_questions > 0) {
    foreach ($questions as $question) {
        $id_pertanyaan = $question['id'];
        $jawaban_benar = $question['correct_option'];
        $jawaban_siswa = isset($_POST["question$id_pertanyaan"]) ? $_POST["question$id_pertanyaan"] : '';

        // Calculate score
        if ($jawaban_siswa == $jawaban_benar) {
            $score = 1;
        } else {
            $score = 0;
        }
        $total_score += $score;

        // Insert into jawaban_siswa
        $sql_jawaban = "INSERT INTO jawaban_siswa (id_siswa, id_pertanyaan, jawaban, skor) VALUES (?, ?, ?, ?)";
        $stmt_jawaban = $conn->prepare($sql_jawaban);

        if (!$stmt_jawaban) {
            die("Preparation failed: " . $conn->error);
        }

        $stmt_jawaban->bind_param("iisi", $id_siswa, $id_pertanyaan, $jawaban_siswa, $score);
        $stmt_jawaban->execute();
    }

    // Calculate percentage score
    $percentage_score = ($total_score / $total_questions) * 100;

    // Insert into hasil_kuis
    $tanggal = date('Y-m-d H:i:s');
    $sql_hasil = "INSERT INTO hasil_kuis (id_siswa, id_kuis, skor, date) VALUES (?, ?, ?, ?)";
    $stmt_hasil = $conn->prepare($sql_hasil);

    if (!$stmt_hasil) {
        die("Preparation failed: " . $conn->error);
    }

    $stmt_hasil->bind_param("iiis", $id_siswa, $id_kuis, $percentage_score, $tanggal);
    $stmt_hasil->execute();
} else {
    echo "Tidak ada pertanyaan untuk diproses.";
    exit();
}



    $sql_kategori = "SELECT nama_kategori FROM kategori_kuis WHERE id_kategori = ?";
    $stmt_kategori = $conn->prepare($sql_kategori);
    $stmt_kategori->bind_param("i", $id_kuis);
    $stmt_kategori->execute();
    $result_kategori = $stmt_kategori->get_result();
    $row_kategori = $result_kategori->fetch_assoc();

    if ($row_kategori) {
        $nama_kategori = $row_kategori['nama_kategori'];
        
        if ($nama_kategori == 'Pre Test') {
            header("Location: pretest.php");
        } elseif ($nama_kategori == 'Post Test') {
            header("Location: posttest.php");
        } else {
            header("Location: kategori.php");
        }
        }
        exit();
?>
