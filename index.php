<?php
    error_reporting(E_ALL);
    include 'config.php';
    include 'connect.php';
    include 'functions.php';
    include 'doc-head.php';
?>

<body>

<?php if (!$_POST) : ?>

    <h1>Vote!</h1>
    <form action="index.php" method="post">
        <input name="voter_name"  placeholder="Your Name" type="text" /> <br />

        <select name="voter_candidate">
            <?php 
            $candidates = getCandidates();
            foreach ($candidates as $candidate) : 
            ?>
            <option value="<?php echo $candidate; ?>"><?php echo $candidate; ?></option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Submit</button>
    </form>

<?php endif; ?>

    <?php 
    $voter = $_POST['voter_name'];
    $vote = $_POST['voter_candidate'];

    if ($_POST) : 
        $table = '1p1v';
        addVoteRecord($mysqli, $table, $voter, $vote);
    ?>

    <p>Thanks for submitting. You voted for <?php echo $vote; ?>.</p>

    <?php endif; ?>

</body>
</html>