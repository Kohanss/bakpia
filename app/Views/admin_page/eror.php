<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .container {
            font-family: Arial, Helvetica, sans-serif;
            width: 100%;
            margin-top: 100px;
            display: flex;
            justify-content: center;
        }

        .sub-container {
            width: 500px;
            height: 200px;
            border-radius: 10px;
            background-color: red;
            text-align: center;
            color: #f8d7da;
        }
    </style>
    <title>Document</title>
</head>

<body>
    <?php //print_r($data); die; 
    ?>
    <div class="container">
        <div class="sub-container">
            <?php $status = $data['status'] ?>
            <?php $message =  $data['message'] ?>
            <h1><?php echo $status ?></h1>
            <h3><?php echo $message ?></h3>
        </div>
    </div>
</body>

</html>