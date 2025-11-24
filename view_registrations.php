<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registered List | Hall-o'-ween Party</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <nav class="navbar navbar-dark sticky-top">
        <div class="container">
            <a class="navbar-brand halloween" href="Homepage.html">🎃 Hall-o'-ween 🎃</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="Homepage.html">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="Boothdirectorypage.html">Booths</a></li>
                    <li class="nav-item"><a class="nav-link" href="feedback.html">Feedback</a></li>

                    <li class="nav-item ms-lg-2 border-start border-secondary d-none d-lg-block"></li>
                    <li class="nav-item"><a class="nav-link text-warning" href="view_registrations.php">View Users</a>
                    </li>
                    <li class="nav-item"><a class="nav-link text-warning" href="view_feedbacks.php">View Feedbacks</a>
                    </li>
                    <li class="nav-item ms-lg-3 mt-2 mt-lg-0">
                        <a class="btn btn-outline-danger btn-sm rounded-pill px-3" href="index.html">
                            Exit 🚪
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>


    <div class="container mt-5 pt-5">
        <h2 class="text-warning text-center mb-4">รายชื่อผู้ลงทะเบียน (Registered Users)</h2>

        <div class="card custom-card p-4">
            <div class="table-responsive">
                <table class="table table-dark table-hover border-warning">
                    <thead>
                        <tr class="text-warning">
                            <th>#</th>
                            <th>เวลาที่ลงทะเบียน</th>
                            <th>ชื่อ-สกุล</th>
                            <th>อีเมล</th>
                            <th>เบอร์โทร</th>
                            <th>ประเภทตั๋ว</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $file = 'data/registrations.json';
                        $data = [];

                        // เช็คว่าไฟล์มีอยู่จริงก่อนโหลด
                        if (file_exists($file)) {
                            $json_content = file_get_contents($file);
                            $data = json_decode($json_content, true);
                        }

                        // ตรวจสอบว่าเป็น Array และมีข้อมูล
                        if (!empty($data) && is_array($data)) {
                            $counter = 1;
                            // เรียงลำดับจาก ใหม่ -> เก่า (ถ้าต้องการ)
                            // $data = array_reverse($data); 
                        
                            foreach ($data as $registration) {
                                // ใช้ ?? '' เพื่อกัน Error กรณี key หาย
                                $timestamp = $registration['timestamp'] ?? '-';
                                $name = $registration['name'] ?? '-';
                                $email = $registration['email'] ?? '-';
                                $phone = $registration['phone'] ?? '-';
                                $ticket = $registration['ticket'] ?? '-';

                                echo "<tr>";
                                echo "<td>" . $counter++ . "</td>";
                                echo "<td>" . htmlspecialchars($timestamp) . "</td>";
                                echo "<td>" . htmlspecialchars($name) . "</td>";
                                echo "<td>" . htmlspecialchars($email) . "</td>";
                                echo "<td>" . htmlspecialchars($phone) . "</td>";
                                echo "<td>" . htmlspecialchars($ticket) . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo '<tr><td colspan="6" class="text-center text-secondary py-4">--- ยังไม่มีผู้ลงทะเบียน (No Data Found) ---</td></tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <footer class="text-center text-white-50 border-top border-dark">
        <p>&copy; 2025 Hall-o'-ween Party. All rights reserved.</p>
    </footer>
</body>

</html>