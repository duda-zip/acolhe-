<?php
include_once "connection.php";
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['profile_image'])) {
    $file = $_FILES['profile_image'];

    if ($file['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $file['tmp_name'];
        $fileExtension = pathinfo($file['name'], PATHINFO_EXTENSION);
        $fileName = uniqid('img_', true) . '.' . $fileExtension;

        $uploadDir = '../uploads/';
        $relativePath = 'uploads/' . $fileName;
        $uploadFilePath = $uploadDir . $fileName;

        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $fileMime = finfo_file($finfo, $fileTmpPath);
        finfo_close($finfo);

        if (!in_array($fileMime, $allowedTypes)) {
            echo "Erro: tipo de arquivo não permitido. Tipo detectado: $fileMime";
            exit();
        }

        if (move_uploaded_file($fileTmpPath, $uploadFilePath)) {

            if (!isset($_SESSION['cnpj'])) {
                echo "Erro: CNPJ não encontrado na sessão.";
                exit();
            }

            $cnpj = $_SESSION['cnpj'];

            try {
                $stmt = $conn->prepare("UPDATE accounts SET profile_image = ? WHERE cnpj = ?");
                $stmt->execute([$relativePath, $cnpj]);

                if ($stmt->rowCount() > 0) {
                    $_SESSION['user']['profile_image'] = $relativePath;
                    header("Location: ../site/profile.php");
                    exit();
                } else {
                    echo "Nenhuma linha foi atualizada. Verifique se o CNPJ está correto: $cnpj";
                }
            } catch (PDOException $e) {
                echo "Erro ao atualizar o banco de dados: " . $e->getMessage();
            }

        } else {
            echo "Erro ao mover o arquivo para o diretório de uploads.";
        }

    } else {
        echo "Erro no upload do arquivo. Código do erro: " . $file['error'];
    }

} else {
    echo "Nenhuma imagem foi enviada.";
}
