<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Age Calculator</title>

    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container">

    <div class="calculator">

        <h1>🎂 Age Calculator</h1>

        <p class="subtitle">
            Calculate your exact age and birth day
        </p>


        <!-- Age Calculator Form -->

        <form method="POST">

            <label for="dob">
                Enter Your Date of Birth
            </label>

            <input
                type="date"
                id="dob"
                name="dob"
                max="<?php echo date('Y-m-d'); ?>"
                required
            >

            <button type="submit" name="calculate">
                Calculate Age
            </button>

        </form>


        <?php

        /* Check whether form is submitted */

        if (isset($_POST['calculate'])) {

            $dob = $_POST['dob'];

            try {

                /* Today's date */

                $today = new DateTime();


                /* User's date of birth */

                $birthDate = new DateTime($dob);


                /* Check future date */

                if ($birthDate > $today) {

                    echo "
                    <div class='error'>
                        ❌ Date of birth cannot be in the future.
                    </div>
                    ";

                } else {

                    /* Calculate exact age */

                    $age = $birthDate->diff($today);


                    /* Find day of birth */

                    $dayOfBirth = $birthDate->format('l');


                    /* Format birth date */

                    $formattedBirthDate = $birthDate->format('d F Y');


                    ?>

                    <!-- Result -->

                    <div class="result">

                        <h2>Your Age</h2>


                        <!-- Age Boxes -->

                        <div class="age-box">

                            <div class="age-item">

                                <span>
                                    <?php echo $age->y; ?>
                                </span>

                                <small>
                                    Years
                                </small>

                            </div>


               
                        </div>


                        <!-- Birth Date -->

                        <div class="birth-info">

                            <p>
                                <strong>Date of Birth:</strong>
                                <?php echo $formattedBirthDate; ?>
                            </p>

                        </div>


                        <!-- Day of Birth -->

                        <div class="birth-day">

                            <p>
                                You were born on
                            </p>

                            <span>
                                <?php echo $dayOfBirth; ?>
                            </span>

                        </div>


                    </div>

                    <?php

                }

            } catch (Exception $e) {

                echo "
                <div class='error'>
                    ❌ Please enter a valid date.
                </div>
                ";

            }

        }

        ?>

    </div>

</div>

</body>

</html>
