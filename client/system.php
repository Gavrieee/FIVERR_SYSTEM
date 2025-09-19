<?php require_once 'classloader.php'; ?>
<?php
if (!$userObj->isLoggedIn()) {
    header("Location: login.php");
    exit;
}

if (!($userObj->isAdmin())) {
    header('Location: ../freelancer/index.php');
    exit;
}

$user_id = $_SESSION['user_id']; // assuming you store logged-in user in session
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: "Arial";
        }

        .navbar .collapse {
            visibility: visible !important;
        }

        @media (min-width: 992px) {
            .navbar-expand-lg .navbar-collapse {
                display: flex !important;
            }
        }
    </style>
</head>

<body>
    <?php include 'includes/navbar.php'; ?>
    <div class="container-fluid">
        <div class="display-4 text-center">Hello there and welcome! Admin <span
                class="text-success"><?php echo $_SESSION['username']; ?> </span>. This page is only for you.</div>
        <div class="text-center">
            <?php
            if (isset($_SESSION['message']) && isset($_SESSION['status'])) {

                if ($_SESSION['status'] == "200") {
                    echo "<h1 style='color: green;'>{$_SESSION['message']}</h1>";
                } else {
                    echo "<h1 style='color: red;'>{$_SESSION['message']}</h1>";
                }

            }
            unset($_SESSION['message']);
            unset($_SESSION['status']);
            ?>
        </div>
        <div class="row justify-content-center">
            <div class="flex flex-col gap-5 md:flex-row md:space-x-5 m-3">

                <div class="card p-4 shadow-md rounded-lg">
                    <h3 class="text-lg font-semibold ">Add a New Category</h3>
                    <label for="categories" class="mb-3 text-gray-500">Create a new Category & its Subcategories</label>
                    <form action="core/handleForms.php" method="POST">
                        <!-- Category Input -->
                        <div class="mb-3">
                            <label for="category" class="form-label">Category Name</label>
                            <input type="text" class="form-control" id="category" name="category" required>
                        </div>

                        <!-- Subcategories -->
                        <div id="subcategories" class="mb-3">
                            <label class="form-label">Subcategories</label>
                            <div class="input-group mb-2 space-x-2">
                                <input type="text" name="subcategories[]" class="form-control rounded-lg"
                                    placeholder="Enter subcategory">
                                <button type="button" class="btn btn-danger remove-sub">Remove</button>
                            </div>
                        </div>

                        <div class="flex flex-row justify-between">
                            <!-- Add More Button -->
                            <button type="button" class="btn btn-secondary" id="addSubcategory">+ Add
                                Subcategory</button>

                            <!-- Submit -->
                            <button type="submit" name="addCategoryBtn" class="btn btn-primary">Save Category</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>

    <script>
        const addSubBtn = document.getElementById('addSubcategory');
        const subContainer = document.getElementById('subcategories');

        addSubBtn.addEventListener('click', () => {
            const div = document.createElement('div');
            div.classList.add('input-group', 'mb-2', 'space-x-2');
            div.innerHTML = `
        <input type="text" name="subcategories[]" class="form-control" placeholder="Enter subcategory" required>
        <button type="button" class="btn btn-danger remove-sub">Remove</button>
      `;
            subContainer.appendChild(div);
        });

        document.addEventListener('click', (e) => {
            if (e.target.classList.contains('remove-sub')) {
                e.target.parentElement.remove();
            }
        });
    </script>


</body>

</html>