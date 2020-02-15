<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Trainning Ecom Admin</title>    
 </head>
<body  class="text-center">
 
    <div class="container" style="padding-top: 100px">
      
        <form method="post" class="form-signin">
            @csrf            
 
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" name="email" id="email" required class="form-control">
            </div>
 
            <div class="form-group">
                <label for="password">Senha</label>
                <input type="password" name="password" id="password" required min="1" class="form-control">
            </div>
 
            <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>            
        </form>
    </div>
</body>
</html>
 
 
