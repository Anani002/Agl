<?php
session_start();

$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $admin_code = $_POST['admin_code'];
    
    // Code admin par défaut (à modifier selon vos besoins)
    $valid_code = 'ADMIN2024';
    
    if ($admin_code === $valid_code) {
        $_SESSION['admin_logged_in'] = true;
        header('Location: admin/dashboard.php');
        exit();
    } else {
        $error = "Code d'accès invalide.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accès Administrateur - JobPlateforme</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="auth-page">
    <div class="auth-container">
        <div class="auth-box">
            <div class="auth-header">
                <i class="fas fa-shield-alt" style="font-size: 3rem; color: #2563eb;"></i>
                <h2>Accès Administrateur</h2>
                <p>Veuillez entrer le code d'accès</p>
            </div>
            
            <?php if ($error): ?>
                <div class="alert alert-error"><?php echo $error; ?></div>
            <?php endif; ?>
            
            <form method="POST" class="auth-form">
                <div class="form-group">
                    <label>Code d'accès</label>
                    <input type="password" name="admin_code" required>
                </div>
                
                <button type="submit" class="btn-submit">Accéder</button>
            </form>
        </div>
    </div>
</body>
</html>