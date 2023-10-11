<?php

    if(!isset($_GET["id"])){
        header("location: /");
        exit();
    }

    require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
    require_once LIB . '/util/util.php';
    
    $id=$_GET["id"];
    $query = "SELECT * FROM products WHERE id = ?";
    $products = fetch($query, ['type' => 'i', 'value' => $id]);

    $query2 = "SELECT * FROM users,user_profile
    WHERE users.id=user_profile.userid
    AND users.id = ?";
    $seller = fetch($query2,['type' => 'i', 'value' => $id]);
?>
<div class = "flex">
    <div class="flex-[1.1] rounded-3xl h-1/2">
        <img class="w-full h-full rounded-3xl" src="<?php echo $products["imageUrl"];?>"  /> 
    </div>
    <div class="flex-[0.9] flex items-stretch card w-full shadow-xl ">
        <div class="card w-full my-auto">
                <div class="radial-progress mx-auto" style="--value:70;">
                    time
                </div>
                <div class="card-body items-center text-center space-x-10 ">
                    <table class="table-auto flex space-x-10"> 
                        <tr>
                            <td class="text-xl">Your bid</td>
                            <td class="text-xl pl-4">Highest bid</td>
                        </tr>
                        <tr>
                            <td id="currentBid">€0</td>
                            <td id="suggestedBid">€<?php echo $products["price"]?></td>
                        </tr>
                    </table>
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Enter amount</span>
                        </label>
                        <label class="input-group">
                            <span>Price</span>
                            <input id="bidInput" type="number" placeholder="0,00" class="input input-bordered"/>
                            <button onClick="bid();"type="submit" class="btn btn-primary" name="bied">Bid</button>

                        </label>
                        </div>
                    </div>
        </div>
    </div>
</div>
<div class = "flex">
    <div>
    <h2 class="card-title mt-8 mx-8"><?php echo $products["name"] ?></h2>
    <div class="mx-8">  <?php echo $products["description"] ?></div>
    </div>
    <div>
        <h2 class="card-title mt-8 mx-8"> about seller:</h2>
    <div>
        <div class="mt-4 mx-8"><?php echo $seller["username"] ?></div>
        <div class="mt-4 mx-8"><?php echo $seller["about"]?></div>
    </div>
    </div>
</div>

<script>


// Whenever the button to bid is clicked, this function will be called and update the current bid price
function bid() {
    // Get the current bid price
    let currentBid = Number(document.getElementById("currentBid").innerHTML.split("€")[1]);
    // Get the suggested bid price
    let suggestedBid = Number(document.getElementById("suggestedBid").innerHTML.split("€")[1]);
    // Get the input field
    let input = document.getElementById("bidInput").value;


    // Check if the input is a number
    if (isNaN(input)) {
        alert("Please enter a number");
    } else {
        // Check if the input is higher than the current bid price
        if (input > currentBid) {
            // Check if the input is higher than the suggested bid price
            if (input > suggestedBid) {
                // Update the suggested bid price
                document.getElementById("suggestedBid").innerHTML = "€" + input;
            }
            // Update the current bid price
            document.getElementById("currentBid").innerHTML = "€" + input;
        } else {
            alert("Please enter a higher bid");
        }

    }
}


</script>
