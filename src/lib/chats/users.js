setInterval(()=>
{
let xhr = new XMLHttpRequest();
xhr.open("GET", "/src/lib/chats/users.php", true);
xhr.onload = ()=>{
    if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
            let data = xhr.response;
            console.log(data);
        }
    }
}
xhr.send();
}, 500);