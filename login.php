<!DOCTYPE html>
<html>
    <head>
    <title>refugee data</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">        
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
    <script src="jquery.js"></script>
    </head>

<body>
    <div class="container mt-2 mb-4 p-2 shadow bg-white">
        <form action="crud.php" method="POST">
            <div class="form-row justify-content-center">
                <div class="col-auto">
                    <input type="text" name="username" class="form-control" id="username" placeholder="user name"> 
                </div>
                <div class="col-auto">
                    <input type="text" name="password" class="form-control" id="password" placeholder="password"> 
                </div>
                <div class="col-auto">
                    <button type="submit" name="save" class="btn btn-info">Save</button> 
                </div>
            </div>
        </form>
    </div>

    <?php require_once("crud.php"); ?>

    <div class="container">
        <?php if(isset($_SESSION['msg'])): ?>
            <div class="<?= $_SESSION['alert']; ?>">
                 <?= $_SESSION['msg']; 
                 unset($_SESSION['msg']); ?>
        </div>
        <?php endif; ?>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>User name</th>
                <th>Password</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <form action="crud.php" method="POST">
            <?php
            $sQuery = "SELECT * FROM data_tbl LIMIT 20";
            $result1 = $conn2 ->query($sQuery);

            $x= 1;

            while($row = $result1->fetch_assoc()):  ?>

            <tr>
                <td> <?= $row['ID']; ?> </td>
                <td> <?= $row['username']; ?> </td>
                <td> <?= $row['password']; ?> </td>
                <td style="width: 15%">
                    <button type="submit" name="delete" value="<?= $row['ID']; ?>" class="btn btn-danger">Delet</button>
                    <button type="button" name="edit" value="<?= $x; $x++; ?>" class="btn btn-primary">Edit</button>
                </td>
            </tr>

            <?php endwhile; ?>
            </form>
        </tbody>

    </table>

    <script type="text/javascript">
        $(document).ready(function(){
            setTimeout(function(){
                $(".alert").remove();
            }, 3000);

            $(".btn-primary").click(function(){
               $(".table").find('tr').eq(this.value).each(function(){
                   $("#username").val($(this).find('td').eq(1).text());
                   $("#password").val($(this).find('td').eq(2).text());
                   $(".btn-info").val($(this).find('td').eq(0).text());
               });
               $(".btn-info").attr("name", "edit");
           });
        });
    </script>
</body>
</html>