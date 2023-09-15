
<?php

  if (isset($_SESSION['user'])) {
    header("Location: /");
    exit();
  }

  $error = $_GET['error'] ?? false;

  if ($error) {
    echo '


    <div class="alert alert-warning w-full max-w-xs mx-auto mb-8">
        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" /></svg>
        <span>' . (ERROR_MAPPING[$error] ?? "Unknown error") .   '</span>
    </div>';
    
  }


?>


<form action="/src/lib/login.php" method="post" class="flex flex-col items-center gap-4">
  <div class="flex flex-col gap-2 w-full max-w-xs">
    <label for="email">Email</label>
    <input
    name="email"
    id="email"
    type="email"
    placeholder="cats.are@best.com"
    class="input input-bordered w-full placeholder:opacity-30"
    required/>
  </div>
  
  <div class="flex flex-col gap-2 w-full max-w-xs">
    <label for="password">Password</label>
    <input
    name="password"
    id="password"
    type="password"
    placeholder="Secret..."
    class="input input-bordered w-full placeholder:opacity-30"
    required />
  </div>

  <input type="submit" name="login" value="login" class="btn btn-wide place-self-center">
</form>
