<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script>
        function validateInput(event) {
            const input = event.target;
            const value = input.value;
            const regex = /^[a-zA-Z\s]*$/;

            if (!regex.test(value)) {
                input.value = value.replace(/[^a-zA-Z\s]/g, '');
            }
        }

        function validatePhoneInput(event) {
            const input = event.target;
            const value = input.value;
            const regex = /^[0-9]*$/;

            if (!regex.test(value)) {
                input.value = value.replace(/[^0-9]/g, '');
            }

            if (value.length > 11) {
                input.value = value.slice(0, 11);
            }
        }
    </script>
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-100">
    <?php include 'validation.php'; ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="p-4 max-w-md mx-auto bg-white rounded-xl shadow-md space-y-4">
        <h2 class="text-xl leading-6 font-bold text-blue-500 text-center pt-4 pb-4">Formulario</h2>
        
        <div class="flex space-x-4">
            <div class="w-1/2">
                <label for="name" class="block text-sm font-medium text-gray-700">Nombre:</label>
                <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($name); ?>" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" oninput="validateInput(event)">
                <span class="text-red-500 text-xs"><?php echo $nameErr;?></span>
            </div>
            <div class="w-1/2">
                <label for="surname" class="block text-sm font-medium text-gray-700">Apellido:</label>
                <input type="text" id="surname" name="surname" value="<?php echo htmlspecialchars($surname); ?>" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" oninput="validateInput(event)">
                <span class="text-red-500 text-xs"><?php echo $surnameErr;?></span>
            </div>
        </div>

        <div class="flex space-x-4">
            <div class="w-1/2">
                <label for="email" class="block text-sm font-medium text-gray-700">Correo Electrónico:</label>
                <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                <span class="text-red-500 text-xs"><?php echo $emailErr;?></span>
            </div>
            <div class="w-1/2">
                <label for="phone" class="block text-sm font-medium text-gray-700">Número de Teléfono:</label>
                <input type="tel" id="phone" name="phone" value="<?php echo htmlspecialchars($phone); ?>" required pattern="[0-9]{11}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" oninput="validatePhoneInput(event)">
                <span class="text-red-500 text-xs"><?php echo $phoneErr;?></span>
            </div>
        </div>

        <div class="flex space-x-4">
            <div class="w-1/2">
                <label for="subject" class="block text-sm font-medium text-gray-700">Asunto:</label>
                <input type="text" id="subject" name="subject" value="<?php echo htmlspecialchars($subject); ?>" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                <span class="text-red-500 text-xs"><?php echo $subjectErr;?></span>
            </div>
            <div class="w-1/2">
                <label for="message" class="block text-sm font-medium text-gray-700">Mensaje:</label>
                <textarea id="message" name="message" rows="4" cols="50" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"><?php echo htmlspecialchars($message); ?></textarea>
                <span class="text-red-500 text-xs"><?php echo $messageErr;?></span>
            </div>
        </div>

        <input type="submit" value="Enviar" class="mt-2 w-full inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
    </form>
</body>
</html>