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

<!--            display notes as list items-->
            <ul>
                <?php foreach ($notes as $note) : ?>
                    <li>
                        <a href="/note?id=<?= $note['id']?>" class="text-blue-500 hover:underline">
                            <?= htmlspecialchars($note['body']) ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>

            <p class="mt-6">
                <a href="/notes/create" class="text-blue-500 hover:underline">Create Note</a>
            </p>

        </div>
    </main>

</div>

</body>
</html>