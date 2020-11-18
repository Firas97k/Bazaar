
<div class="box float_left shadow">
    <div class="info float_left">

        <h3><?php echo $ad->getAdvertisingTitle();?></h3>

        <p>ad Number: <?php echo $ad->getadNumber();?></p>
        <p>ad Type: <?php echo $ad->getadType();?></p>
        <p>City: <?php echo $ad->getCity();?></p>
        <p>Qwner: <?php echo $ad->getOwner();?></p>
        <p>Price: <?php echo $ad->getPrice();?></p>
        <p>Description: </p>
        <p><?php echo $ad->getdescription();?></p>

        <p>Date: <?php echo $ad->getDate();?></p>
        <input type="submit" value="More Details" />
    </div>

    <div class="images float_right">

       <?php echo $ad->displayImage($img[0]);?>
       <?php echo $ad->displayImage($img[1]);?>
       <?php echo $ad->displayImage($img[2]);?>
       <?php echo $ad->displayImage($img[3]);?>
       <?php echo $ad->displayImage($img[4]);?>
        
    </div>
    <div class="control float_right ">
        <span id="previous" class="previous float_left text_center">Previous</span>
        <span id="dots" class="dots">
            <ul id="ul_dots">
                <li data-index="1">1</li>
                <li data-index="2">2</li>
                <li data-index="3">3</li>
                <li data-index="4">4</li>
                <li data-index="5">5</li>
            </ul>
        </span>
        <span id="next" class="next float_right text_center">Next</span>
    </div>
</div>