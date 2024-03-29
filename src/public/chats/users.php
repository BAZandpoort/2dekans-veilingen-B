<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once DATABASE . '/connect.php';
if (!isset($_SESSION['user'])) {
    header('Location: /account/login');
    return;
}
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
<body>
    <div class="box">
        <div class="wrapper">
            <section class="users">
                <header>
                    <?php
                        $userid = $_SESSION['user']['id'];
                        $sql = mysqli_query($connection, "SELECT *
                        FROM users
                        JOIN user_profile ON users.id = user_profile.userid
                        WHERE users.id = $userid");
                        if (mysqli_num_rows($sql) > 0) {
                            $row = mysqli_fetch_assoc($sql);
                        }
                    ?>
                    <div class="content">
                        <img src="/public/images/<?php echo $row['profilepicture'] ?>">
                        <div class="details">
                            <span><?php echo $row['firstname'] . " " . $row['lastname'] ?></span>
                            <p class="status-dot">Online now</p>
                        </div>
                    </div>
                </header>
                <div class="search">
                    <span class="text"></span>
                    <input type="text" placeholder="Enter name to search...">
                    <button><i class="fas fa-search"></i></button>
                </div>
                <div class="users-list">
                </div>
            </section>
        </div>
    </div>
    <!-- <script src="/public/js/get-user-chats.js"></script> -->
    <script src="/public/js/chat/user-chats.js"></script>
    <script src="/public/js/chat/search.js"></script>
</body>
<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins');
*
{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    text-decoration: none;
}
.box
{
    padding-left: 35%;
}
.wrapper
{
    background: #fff;
    width: 450px;
    border-radius: 16px;
    box-shadow: 0 0 128px 0 rgba(0,0,0,0.1), 0 32px 64px -48px rgba(0,0,0,0.5);
}
.users
{
    padding: 25px 30px;
}
.users header, .users-list a
{
    display: flex;
    align-items: center;
    padding-bottom: 20px;
    justify-content: space-between;
    border-bottom: 1px solid #e6e6e6;
}
.wrapper img
{
    object-fit: cover;
    border-radius: 50%;
}
:is(.users, .users-list) .content
{
    display: flex;
    align-items: center;
}
.users header .content img
{
    height: 50px;
    width: 50px;    
}
:is(.users, .users-list) .details
{
    margin-left: 15px;
    color: #000;
}
:is(.users, .users-list) .details span
{
    font-size: 18px;
    font-weight: 500; 
}
.users .search
{
    margin: 20px 0;
    display: flex;
    align-items: center;
    justify-content: space-between;
}
.users .search .text
{
    font-size: 18px;
}
.users .search input
{
    position: absolute;
    height: 42px;
    width: 22%;
    border: 1px solid #ccc;
    padding: 0 13px;
    font-size: 16px;
    border-radius: 5px 0 0 5px;
    outline: none;
}
.users .search button
{
    width: 47px;
    height: 42px;
    border: none;
    outline: none;
    color: #fff;
    background: #333;
    cursor: pointer;
    font-size: 17px;
    border-radius: 0 5px 5px 0;
}
.users-list 
{
    max-height: 350px;
    overflow-y: auto;
}
.users-list::-webkit-scrollbar
{
    width: 5px;
}

.users-list a
{
    margin-bottom: 15px;
    padding-bottom: 10px;
    padding-right: 15px;
    border-bottom-color: #f1f1f1;
}

.users-list a:last-child
{
    border: none;
    margin-bottom: 0px;
}

.users-list a .content img
{
    height: 40px;
    width: 40px;
}

.users-list a .content p
{
    color: #67676a;;
}

.content .status-dot
{
    font-size: 15px;
}

</style>
