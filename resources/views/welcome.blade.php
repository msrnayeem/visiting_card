<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>API Endpoint and User Permissions</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            padding: 30px;
            background-color: #f8f9fa;
        }
        h1, .card-header {
            color: #343a40;
        }
        code {
            background-color: #e9ecef;
            padding: 2px 4px;
            border-radius: 4px;
        }
    </style>
</head>
<body>

<div class="container">
    <h1 class="mb-4">📘 API Endpoint Overview</h1>

    <div class="card mb-5 shadow">
        <div class="card-header bg-primary text-white">
            📌 Available Endpoints
        </div>
        <div class="card-body">
            <ul>
                <li><strong>GET</strong> <code>/login</code> – Log in with email and password to receive a token.</li>
                <li><strong>POST</strong> <code>/logout</code> – Log out and invalidate the token.</li>
                <li><strong>POST</strong> <code>/generate-card</code> – Generate a business card PDF.</li>
                <li><strong>POST</strong> <code>/search</code> – Search for a business card by ID.</li>
                <li><strong>DELETE</strong> <code>/card/{id}</code> – Delete a business card by ID.</li>
            </ul>
        </div>
    </div>

    <div class="card shadow">
        <div class="card-header bg-success text-white">
            👤 User Permissions
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead class="table-light">
                    <tr>
                        <th>User</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Permissions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Admin User</td>
                        <td><code>admin@example.com</code></td>
                        <td>admin</td>
                        <td>create, read, update, delete</td>
                    </tr>
                    <tr>
                        <td>Regular User</td>
                        <td><code>user@example.com</code></td>
                        <td>user</td>
                        <td>read, create</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="text-center">
        <h5 class="mt-5">🖼️ Sample Business Card Preview</h5>
        <img src="{{ asset('sample.jpeg') }}" alt="Sample Business Card" class="img-fluid my-3 rounded shadow" style="max-width: 400px;">
    </div>

    
</div>

<!-- Bootstrap JS (optional) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
