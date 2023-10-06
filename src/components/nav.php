<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once LIB . '/util/util.php';

$userid = isset($_SESSION['user']) ? $_SESSION['user']['id'] : null;

if ($userid) {
  $query = 'SELECT * FROM user_profile WHERE userid = ?';
  $data = fetch($query, ['type' => 'i', 'value' => $userid]);

  $theme = $data['theme'] === 'dark' ? 'light' : 'dark';
}
?>

<div class="navbar bg-base-100">
  <div class="navbar-start flex-1">
    <a href="/" class="btn btn-ghost normal-case text-xl">2dekans veilingen</a>
  </div>

  <div class="flex-1">
    <div class="form-control w-full">
      <input type="text" placeholder="Search" class="input input-bordered w-24 md:w-auto" />
    </div>
    <div class="dropdown dropdown-end">
    </div>
  </div>

  <div class="flex-1 justify-end">
    <div class="dropdown dropdown-end mr-4">
    </div>
    <?php echo isset($_SESSION['user'])
      ? '
        <div class="dropdown dropdown-end">
          <label tabindex="0" class="btn btn-ghost btn-circle avatar">
            <div class="w-10 rounded-full">
              <img src="https://avatars.githubusercontent.com/u/64209400?v=4" />
            </div>
          </label>
          <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
            <li>
              <a class="justify-between">
                Profile
                <span class="badge">New</span>
              </a>
            </li>
            <li><a href="/src/lib/account/change-theme.php" >Switch to ' . $theme . '</a></li>
            <li><a href="/account/settings/edit">Settings</a></li>
            <li><a href="/account/logout"> logout</a></li>
            
          </ul>
        </div>
        '
      : '<a href="/account/login" class="btn"> Login</a>'; ?>
  </div>
</div>

<div class="navbar bg-base-100 shadow-sm pt-8">
  <div class="navbar-start flex-1">
  </div>
  <div class="navbar-center hidden lg:flex">
    <ul class="menu menu-horizontal px-1 gap-16">
    <?php
        $categories = fetch('SELECT * FROM product_categories LIMIT 10');

        if ($categories) {
          
          foreach ($categories as $category) {
            echo '<a href="/catalog/products?category=' . $category['name'] . '" class="group flex flex-col gap-4 items-center">
              <i class="fa-solid ' . $category['icons'] . ' fa-2xl group-hover:-translate-y-1 transition"></i>
              <span class="label-text">' . $category['name'] . '</span>
            </a>';
          }
        }

      ?>

    </ul>
  </div>

  <div class="flex-1 justify-end">
  </div>
</div>