<?php
// Endpoint e helpers úteis para operações administrativas (deletar, etc.)
require_once __DIR__ . '/config.php';

if (!isset($_SESSION)){
    session_start();
}

// Helper: deleta música
function deleteMusicaById(int $id): bool {
    global $conexao;
    $stmt = $conexao->prepare('DELETE FROM musica WHERE id = ? LIMIT 1');
    if (!$stmt) return false;
    $stmt->bind_param('i', $id);
    $ok = $stmt->execute();
    $stmt->close();
    return $ok;
}

// Helper: deleta usuário
function deleteUsuarioById(int $id): bool {
    global $conexao;
    $stmt = $conexao->prepare('DELETE FROM usuarios WHERE id = ? LIMIT 1');
    if (!$stmt) return false;
    $stmt->bind_param('i', $id);
    $ok = $stmt->execute();
    $stmt->close();
    return $ok;
}

// Helper: deleta artista
function deleteArtistaById(int $id): bool {
    global $conexao;
    $stmt = $conexao->prepare('DELETE FROM artistas WHERE id = ? LIMIT 1');
    if (!$stmt) return false;
    $stmt->bind_param('i', $id);
    $ok = $stmt->execute();
    $stmt->close();
    return $ok;
}

//Se for uma requisição POST, trate como endpoint
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    
    if ($action == '') {
        exit();
    }

    // Opcional: checar permissão (comentado). Ative conforme sua lógica de sessão/roles
    // if (!isset($_SESSION['user_id'])) { http_response_code(403); echo json_encode(['error'=>'not_authenticated']); exit; }

    if ($action === 'deleteUsuario') {
        $id = isset($_POST['id']) ? intval($_POST['id']) : 0;
        if ($id <= 0) {
            http_response_code(400);
            echo json_encode(['error' => 'invalid_id']);
            exit();
        }
        $ok = deleteUsuarioById($id);
        if ($ok) {
            echo json_encode(['success' => true]);
        } else {
            http_response_code(500);
            echo json_encode(['error' => 'delete_failed']);
        }
        exit();
    }

    if ($action === 'deleteMusica') {
        $id = isset($_POST['id']) ? intval($_POST['id']) : 0;
        if ($id <= 0) { http_response_code(400); echo json_encode(['error'=>'invalid_id']); exit(); }
        $ok = deleteMusicaById($id);
        if ($ok) echo json_encode(['success'=>true]); else { http_response_code(500); echo json_encode(['error'=>'delete_failed']); }
        exit();
    }

    if ($action === 'deleteArtista') {
        $id = isset($_POST['id']) ? intval($_POST['id']) : 0;
        if ($id <= 0) { http_response_code(400); echo json_encode(['error'=>'invalid_id']); exit(); }
        $ok = deleteArtistaById($id);
        if ($ok) echo json_encode(['success'=>true]); else { http_response_code(500); echo json_encode(['error'=>'delete_failed']); }
        exit();
    }

    http_response_code(400);
    echo json_encode(['error' => 'unknown_action']);
    exit();
}
?>