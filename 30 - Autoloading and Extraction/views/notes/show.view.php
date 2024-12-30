<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">
<head>
    <meta charset="UTF-8">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Page Links</title>
</head>
<body class="h-full">

<div class="min-h-full">
    <?php require base_path('views/partials/nav.php') ?>

    <?php require base_path('views/partials/header.php') ?>

    <main>
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">

<!--            Go back button-->
            <p class="mb-6">
            <a href="/notes" class="text-blue-500 underline mb-6"> << All notes.... </a>
            </p>
<!--            display notes as list items-->

            <?= htmlspecialchars($note['body']) ?>

        </div>
    </main>

</div>

</body>
</html>