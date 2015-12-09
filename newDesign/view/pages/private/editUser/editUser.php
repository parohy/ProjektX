<?php
/**
 * Created by PhpStorm.
 * User: Matus ,Dominik
 * Date: 8. 12. 2015
 * Time: 22:04
 */

// DO EDIT USER ?>
<link rel="stylesheet" href="libraries/css/editUser.css">

<form id="profile" action="" method="POST">

    <fieldset id="edit-profile">
        <legend>EDIT PROFILE</legend>
        <ul>
            <li>

                <input class="edit-input" type="text" name="name" value="" placeholder="NAME">
            </li>

            <li>

                <input class="edit-input" type="text" name="surename" value="" placeholder="SURNAME">
            </li>

            <li>

                <input class="edit-input" type="email" name="mail" value="" placeholder="EMAIL">
            </li>


            <li>

                <input class="edit-input" type="text" name="mobile" value="" placeholder="MOBILE PHONE">
            </li>

            <li>

                <input class="edit-input" type="text" name="address"value="" placeholder="ADRESS">
            </li>

            <li>

                <input class="edit-input"  type="text" name="city"  value="" placeholder="CITY">
            </li>

            <li>

                <input class="edit-input" type="text" name="postcode" value="" placeholder="POSTCODE">
            </li>

            <li>
                <input id="edit-profile-submit" type="submit" value="SAVE CHANGE">
            </li>
        </ul>
    </fieldset>
</form>
