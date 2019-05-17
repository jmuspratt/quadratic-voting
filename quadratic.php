<?php
    error_reporting(E_ALL);
    include 'config.php';
    include 'connect.php';
    include 'functions.php';
    include 'doc-head.php';
?>


<style>

</style>


<body>

<?php if (!$_POST) : ?>
<h1>Vote Quadratically!</h1>

    <form action="quadratic.php" method="post">
        <input name="voter_name"  placeholder="Your Name" type="text" /> <br />

            <?php 
            $candidates = getCandidates();
            foreach ($candidates as $candidate) : 
            ?>
              <p class="target target-<?php echo $candidate;?>"> 
                <button class="btn btn--minus">-</button> 
                <button class="btn btn--plus">+</button> 
                <span class="candidate__name"><?php echo $candidate; ?></span> 
                <span class="target-votes">0</span> 
                <span class="target-tokens">0 tokens</span>
              </p>

            <?php endforeach; ?>

            <input id="vote" name="vote" type="hidden" value=""/>

        <p>Tokens remaining: <span class="js-remaining votes-remaining">100</span>

        <button class="quadratic-submit" type="submit">Submit</button>
    </form>
    <?php endif; ?>


    <?php 
    $voter = $_POST['voter_name'];
    $vote = $_POST['vote'];

    if ($_POST) : 
        $table = 'quadratic';
        addVoteRecord($mysqli, $table, $voter, $vote);
    ?>

    <p>Thanks for submitting.</p>

    <?php endif;

    ?>

</body>
</html>