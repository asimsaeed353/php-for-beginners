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

            <form method="POST">
                <div class="space-y-12">
                    <div class="col-span-full">
                        <label for="body" class="block text-sm/6 font-medium text-gray-900">Description</label>
                        <div class="mt-2">
                            <textarea name="body" id="body" rows="3" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" placeholder="Here's an idea for a note...." required> <?= $_POST['body'] ?? '' ?>
                            </textarea>

<!--                            // Display error message to user after server-side validation-->
                            <?php if(isset($errors['body'])) : ?>
                            <p class="text-red-500 text-s mt-1"><?= $errors['body'] ?></p>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>

                <div class="mt-6 flex items-center justify-end gap-x-6">
                    <button type="button" class="text-sm/6 font-semibold text-gray-900">Cancel</button>
                    <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
                </div>
            </form>

        </div>
    </main>

</div>

</body>
</html>