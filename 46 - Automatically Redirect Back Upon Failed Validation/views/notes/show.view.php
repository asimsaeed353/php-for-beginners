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

            <footer class="mt-6">
            <a href="/note/edit?id=<?= $note['id'] ?>" class="rounded-md bg-gray-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600" >Edit</a>
                </footer>

            <form method="POST" class="mt-6">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="id" value="<?= $note['id'] ?>">
                <button class="text-sm text-red-500">Delete</button>
            </form>

        </div>
    </main>

</div>

</body>
</html>