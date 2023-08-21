<!DOCTYPE html>
<html>
<head>
    <title>Therapist</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            font-weight: bold;
        }
        input[type="text"],
        input[type="email"],
        input[type="number"],
        textarea,
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            font-size: 14px;
            margin-top: 5px;
        }
        select {
            padding: 8px 4px;
        }
        .btn {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php if (isset($_SESSION['errors'])): ?>
        <ul>
            <?php foreach ($_SESSION['errors'] as $error): ?>
            <li>
                <?php echo $error; ?>
            </li>
            <?php endforeach; ?>
        </ul>
        <?php unset($_SESSION['errors']); ?>
        <?php endif; ?>

        <form method="POST" action="addform.php">
            <div class="form-group">
                <label>Name:</label>
                <input type="text" name="name" required>
            </div>

            <div class="form-group">
                <label>Email:</label>
                <input type="email" name="email" required>
            </div>

            <div class="form-group">
                <label>Gender:</label>
                <select name="gender" required>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                </select>
            </div>

            <div class="form-group">
                <label>Specialization:</label>
                <input type="text" name="specialization" required>
            </div>

            <div class="form-group">
                <label>Years of Experience:</label>
                <input type="number" name="yearofexp" required>
            </div>

            <div class="form-group">
                <label>Description:</label>
                <textarea name="description" rows="4" cols="50"></textarea>
            </div>

            <div class="form-group">
                <input type="submit" class="btn" value="submit" name="submit">
            </div>
        </form>
    </div>
</body>
</html>


