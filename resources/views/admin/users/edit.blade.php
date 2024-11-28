<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pengguna</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            width: 100%;
            max-width: 500px;
            margin: 0 auto;
            padding: 30px;
            border-radius: 8px;
            background-color: #fff;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .form-title {
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            font-size: 16px;
            margin-bottom: 5px;
        }

        .form-input {
            width: 100%;
            padding: 10px;
            font-size: 14px;
            border-radius: 8px;
            border: 1px solid #ddd;
            margin-top: 5px;
        }

        .btn-submit {
            display: inline-block;
            width: 100%;
            padding: 12px;
            background-color: #6d4c41;
            color: white;
            font-size: 16px;
            text-align: center;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-submit:hover {
            background-color: #3e2723;
        }

        .btn-cancel {
            display: inline-block;
            padding: 12px;
            margin-top: 10px;
            background-color: #ddd;
            color: black;
            font-size: 16px;
            text-align: center;
            border-radius: 8px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .btn-cancel:hover {
            background-color: #bbb;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="form-title">Edit Pengguna</h1>
        <form action="{{ route('admin.users.edit', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="fullname">Nama Lengkap</label>
                <input type="text" name="fullname" id="fullname" class="form-input" value="{{ $user->fullname }}" required>
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" class="form-input" value="{{ $user->username }}" required>
            </div>
            <div class="form-group">
                <label for="password">Password (Opsional)</label>
                <input type="password" name="password" id="password" class="form-input">
            </div>
            <div class="form-group">
                <label for="password_confirmation">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-input">
            </div>
            <div class="form-group">
                <label for="role">Role</label>
                <select name="role" id="role" class="form-input" required>
                    <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
                    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                </select>
            </div>
            <button type="submit" class="btn-submit">Perbarui</button>
        </form>

        <a href="{{ route('admin.users.index') }}" class="btn-cancel">Batal</a>
    </div>
</body>
</html>
