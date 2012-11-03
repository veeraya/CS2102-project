<div class="container_12">
    <h2>Top  5 restaurants with highest food rating</h2>
    <table border="2">
        <tr>
            <th>Restaurant</th>
            <th>Average food rating</th>
        </tr>
        <?php foreach ($bestFoodRating as $bestFoodRestaurant): ?>
        <tr>
            <td>
                <h3>
                    <a href="<?php echo base_url() ?>index.php/restaurants/<?php echo $bestFoodRestaurant['url']; ?>
                        ">
                        <?php echo $bestFoodRestaurant['name'] ?></a>
                </h3>
            </td>
            <td>
                <?php echo $bestFoodRestaurant['food_rating'] ?></td>
        </tr>
        <?php endforeach ?>
    </table>

    <h2>Top  5 restaurants with highest service rating</h2>
    <table border="2">
        <tr>
            <th>Restaurant</th>
            <th>Average food rating</th>
        </tr>
        <?php foreach ($bestServiceRating as $bestServiceRestaurant): ?>
        <tr>
            <td>
                <h3>
                    <a href="<?php echo base_url() ?>index.php/restaurants/<?php echo $bestServiceRestaurant['url']; ?>">
                        <?php echo $bestServiceRestaurant['name'] ?></a>
                </h3>
            </td>
            <td>
                <?php echo $bestServiceRestaurant['service_rating'] ?></td>
        </tr>
        <?php endforeach ?>
    </table>

    <h2>Top  5 restaurants with highest recommendation percentage</h2>
    <table border="2">
        <tr>
            <th>Restaurant</th>
            <th>% recommendation</th>
        </tr>
        <?php foreach ($bestRecommend as $bestRecommendRestaurant): ?>
        <tr>
            <td>
                <h3>
                    <a href="<?php echo base_url() ?>index.php/restaurants/<?php echo $bestRecommendRestaurant['url']; ?>">
                        <?php echo $bestRecommendRestaurant['name'] ?></a>
                </h3>
            </td>
            <td>
                <?php echo ($bestRecommendRestaurant['recommend_percent']*100) ?>%</td>
        </tr>
        <?php endforeach ?>
    </table>
</div>