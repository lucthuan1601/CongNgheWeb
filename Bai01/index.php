<?php
    session_start();
    $initial_flowers = [ 
        [ 
            'id' => 1, 
            'name' => 'Hoa dạ yến thảo', 
            'description' => 'Hoa dạ yến thảo tượng trưng cho sự sung túc, tình yêu và hạnh phúc viên mãn. Hoa thích hợp để trồng trong mùa xuân và đầu mùa hè. Cây có hoa to, nở rộ rực rỡ, lại khá dễ trồng và chăm sóc.', 
            'image' => 'hoadep/dayenthao.webp' 
        ],
        [ 
            'id' => 2, 
            'name' => 'Hoa đồng tiền', 
            'description' => 'Hoa đồng tiền thích hợp để trồng trong mùa xuân và đầu mùa hè, khi mà cường độ ánh sáng chưa quá mạnh. Cây có hoa to, nở rộ rực rỡ, lại khá dễ trồng và chăm sóc nên sẽ là lựa chọn thích hợp của bạn trong tiết trời này. Về mặt ý nghĩa, hoa đồng tiền cũng tượng trưng cho sự sung túc, tình yêu và hạnh phúc viên mãn.', 
            'image' => 'hoadep/dongtien.webp' 
        ],
        [ 
            'id' => 3, 
            'name' => 'Hoa giấy', 
            'description' => 'Hoa giấy có mặt ở hầu khắp mọi nơi trên đất nước ta, thích hợp với nhiều điều kiện sống khác nhau nên rất dễ trồng, không tốn quá nhiều công chăm sóc nhưng thành quả mang lại sẽ khiến bạn vô cùng hài lòng. Hoa giấy mỏng manh nhưng rất lâu tàn, với nhiều màu như trắng, xanh, đỏ, hồng, tím, vàng… cùng nhiều sắc độ khác nhau.', 
            'image' => 'hoadep/hoagiay.webp' 
        ],
        [ 
            'id' => 4, 
            'name' => 'Hoa thanh tú', 
            'description' => 'Hoa thanh tú, giống như tên gọi, mang vẻ đẹp tinh tế, thanh cao, dễ dàng làm đẹp cho khu vườn của bạn.', 
            'image' => 'hoadep/thanhtu.webp' 
        ],
        [ 
            'id' => 5, 
            'name' => 'Hoa đèn lồng', 
            'description' => 'Giống như tên gọi, hoa đèn lồng có vẻ đẹp giống như chiếc đèn lồng đỏ trên cao. Chúng thường nở rộ thành từng chùm, tạo nên khung cảnh rực rỡ.', 
            'image' => 'hoadep/denlong.webp' 
        ],
        [ 
            'id' => 6, 
            'name' => 'Hoa cẩm chướng', 
            'description' => 'Hoa cẩm chướng tượng trưng cho tình yêu và sự ngưỡng mộ, là loại hoa phổ biến trong nhiều dịp lễ.', 
            'image' => 'hoadep/camchuong.webp' 
        ],
        [ 
            'id' => 7, 
            'name' => 'Hoa huỳnh anh', 
            'description' => 'Biểu tượng của sự trong sáng, quý phái và niềm kiêu hãnh. Hoa huỳnh anh có màu vàng rực rỡ, dễ trồng.', 
            'image' => 'hoadep/huynhanh.webp' 
        ],
        [ 
            'id' => 8, 
            'name' => 'Hoa Păng-xê', 
            'description' => 'Hoa Păng-xê (Pansy) tượng trưng cho tình yêu không phai mờ và sự gắn bó sâu sắc, nổi bật với các màu sắc đan xen.', 
            'image' => 'hoadep/phang_xe.webp' 
        ],
        [ 
            'id' => 9, 
            'name' => 'Hoa Sen', 
            'description' => 'Biểu tượng của sự thuần khiết, thanh cao và ý chí kiên cường trong văn hóa Á Đông.', 
            'image' => 'hoadep/hoasen.webp' 
        ],
        [ 
            'id' => 10, 
            'name' => 'Hoa dừa cạn', 
            'description' => 'Mang vẻ đẹp hoang dại, đại diện cho tình yêu thầm kín, mãnh liệt. Dễ trồng và nở hoa quanh năm.', 
            'image' => 'hoadep/duacan.webp' 
        ],
        [ 
            'id' => 11, 
            'name' => 'Hoa sử quân tử', 
            'description' => 'Tượng trưng cho sự ngưỡng mộ, tình bạn và sức khỏe dồi dào. Là cây leo tạo bóng mát.', 
            'image' => 'hoadep/quantu.webp' 
        ],
        [ 
            'id' => 12, 
            'name' => 'Hoa Cúc lá nho', 
            'description' => 'Biểu tượng của sự tự do, hạnh phúc và sự vươn lên mạnh mẽ. Thích hợp trồng bồn.', 
            'image' => 'hoadep/cuclanho.webp' 
        ],
        [ 
            'id' => 13, 
            'name' => 'Hoa Cẩm tú cầu', 
            'description' => 'Hoa Cẩm tú cầu tượng trưng cho sự gắn bó và lòng biết ơn, màu hoa thay đổi theo độ pH của đất.', 
            'image' => 'hoadep/camtucau.webp' 
        ],
        [ 
            'id' => 14, 
            'name' => 'Hoa cúc dại', 
            'description' => 'Tượng trưng cho sự ngây thơ và vẻ đẹp hoang sơ, thường mọc thành bụi.', 
            'image' => 'hoadep/cucdai.webp' 
        ] 
    ];
    if (!isset($_SESSION['flowers'])) {
        $_SESSION['flowers'] = $initial_flowers;
    }
    $flowers = $_SESSION['flowers'];
    $max_id = 0;
    if (!empty($flowers)) {
        $flower_ids = array_column($flowers, 'id');
        $max_id = max($flower_ids);
    }

    $is_admin = isset($_GET['mode']) && $_GET['mode'] === 'admin';
    $action = $_GET['action'] ?? null;
    $edit_id = $_GET['id'] ?? null;
    $message = null;
    $edit_flower = null;


    if ($is_admin) {
        if ($action === 'delete' && $edit_id !== null) {
            $new_flowers = [];
            foreach ($flowers as $flower) {
                if ($flower['id'] != $edit_id) {
                    $new_flowers[] = $flower;
                }
            }
            $_SESSION['flowers'] = $new_flowers;
            header('Location: ?mode=admin');
            exit;
        }
        if ($action === 'edit' && $edit_id !== null) {
            foreach ($flowers as $flower) {
                if ($flower['id'] == $edit_id) {
                    $edit_flower = $flower;
                    break;
                }
            }
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $new_name = $_POST['name'] ?? '';
            $new_description = $_POST['description'] ?? '';
            $new_image = $_POST['image'] ?? 'hoadep/default.webp'; 
            $post_id = $_POST['id'] ?? null;

            if ($post_id === '') { 
                $new_id = $max_id + 1;
                $new_flower = [
                    'id' => $new_id,
                    'name' => $new_name,
                    'description' => $new_description,
                    'image' => $new_image
                ];
                $_SESSION['flowers'][] = $new_flower;
                $message = ['type' => 'success', 'text' => 'Thêm hoa mới thành công!'];

            } elseif ($post_id !== null) { 
                foreach ($_SESSION['flowers'] as $key => $flower) {
                    if ($flower['id'] == $post_id) {
                        $_SESSION['flowers'][$key]['name'] = $new_name;
                        $_SESSION['flowers'][$key]['description'] = $new_description;
                        $_SESSION['flowers'][$key]['image'] = $new_image;
                        $message = ['type' => 'success', 'text' => 'Cập nhật hoa thành công!'];
                        break;
                    }
                }
            }
            header('Location: ?mode=admin');
            exit;
        }
    }
    $flowers = $_SESSION['flowers'];
    $page_title = $is_admin ? 'Quản Lý Hoa (Admin)' : 'Danh Sách Hoa (Khách)';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title><?php echo htmlspecialchars($page_title); ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <style>
        .flower-card-img {
            max-height: 250px;
            object-fit: cover;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4"><?php echo "14 loại hoa tuyệt đẹp thích hợp trồng để khoe hương sắc dịp xuân hè"; ?></h1>

        <div class="mb-4 text-center">
            <?php if ($is_admin): ?>
                <a href="?" class="btn btn-outline-primary"><i class="bi bi-eye"></i> Xem Dạng Khách</a>
            <?php else: ?>
                <a href="?mode=admin" class="btn btn-outline-danger"><i class="bi bi-gear"></i> Chế Độ Quản Trị</a>
            <?php endif; ?>
        </div>
        <hr>
        
        <?php if ($is_admin): ?>
            <h2 class="mb-3">Danh sách Quản trị</h2>

            <?php if (isset($message)): ?>
                <div class="alert alert-<?php echo $message['type']; ?>"><?php echo $message['text']; ?></div>
            <?php endif; ?>

            <button class="btn btn-success mb-3" type="button" data-bs-toggle="collapse" data-bs-target="#flowerForm" aria-expanded="<?php echo ($action === 'edit' ? 'true' : 'false'); ?>" aria-controls="flowerForm">
                <i class="bi bi-plus-circle"></i> <?php echo ($action === 'edit' ? 'Chỉnh Sửa Hoa ID: ' . $edit_id : 'Thêm Hoa Mới (C - Create)'); ?>
            </button>
            
            <div class="collapse <?php echo ($action === 'edit' ? 'show' : ''); ?>" id="flowerForm">
                <div class="card card-body mb-4 shadow-sm">
                    <h4><?php echo ($action === 'edit' ? 'Chỉnh Sửa' : 'Thêm Mới'); ?></h4>
                    <form method="POST" action="?mode=admin">
                        <input type="hidden" name="id" value="<?php echo htmlspecialchars($edit_flower['id'] ?? ''); ?>">
                        
                        <div class="mb-3">
                            <label for="name" class="form-label">Tên Hoa</label>
                            <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlspecialchars($edit_flower['name'] ?? ''); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Mô tả</label>
                            <textarea class="form-control" id="description" name="description" rows="3" required><?php echo htmlspecialchars($edit_flower['description'] ?? ''); ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Đường dẫn Ảnh (VD: hoadep/tenhoa.webp)</label>
                            <input type="text" class="form-control" id="image" name="image" value="<?php echo htmlspecialchars($edit_flower['image'] ?? ''); ?>">
                        </div>
                        <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Lưu</button>
                        <a href="?mode=admin" class="btn btn-secondary">Hủy</a>
                    </form>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Tên Hoa</th>
                            <th>Mô Tả (Rút gọn)</th>
                            <th>Ảnh</th>
                            <th class="text-center">Thao Tác (U/D)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($flowers as $flower): ?>
                        <tr>
                            <td><?php echo $flower['id']; ?></td>
                            <td><?php echo htmlspecialchars($flower['name']); ?></td>
                            <td><?php echo htmlspecialchars(mb_substr($flower['description'], 0, 80, 'UTF-8') . '...'); ?></td>
                            <td><img src="<?php echo htmlspecialchars($flower['image']); ?>" alt="Ảnh <?php echo htmlspecialchars($flower['name']); ?>" width="50" height="50"></td>
                            <td class="text-center">
                                <a href="?mode=admin&action=edit&id=<?php echo $flower['id']; ?>" class="btn btn-sm btn-warning me-2"><i class="bi bi-pencil"></i> Sửa</a>
                                <a href="?mode=admin&action=delete&id=<?php echo $flower['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa hoa ID <?php echo $flower['id']; ?> không?')"><i class="bi bi-trash"></i> Xóa</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

        <?php else: ?>
            <h2 class="mb-3">Bộ sưu tập các loài hoa</h2>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
                <?php foreach($flowers as $flower): ?>
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        <img src="<?php echo htmlspecialchars($flower['image']); ?>" class="card-img-top flower-card-img" alt="<?php echo htmlspecialchars($flower['name']); ?>">
                        <div class="card-body">
                            <h5 class="card-title text-primary"><?php echo htmlspecialchars($flower['name']); ?></h5>
                            <p class="card-text">
                                <?php echo htmlspecialchars(mb_substr($flower['description'], 0, 150, 'UTF-8') . '...'); ?>
                            </p>
                        </div>
                        <div class="card-footer">
                            <a href="#" class="btn btn-sm btn-outline-secondary">Xem chi tiết</a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>