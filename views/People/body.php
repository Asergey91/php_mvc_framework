<?php
    $people=\D::$a['Data'];
?>
<form action="?controller=People&action=submit" method="post">
    <table>
        <tr>
            <th>First name</th>
            <th>Last name</th>
            <th>Email Address</th>
            <th>Job Role</th>
            <th>Delete</th>
        </tr>
        <?php
        $counter=0;
        foreach ($people as $person) {
        echo'
        <tr>
            <input type="hidden" name="people['.$counter.'][id]" value="'.$person['id'].'" />
            <td><input type="text" name="people['.$counter.'][first_name]" value="'.$person['first_name'].'" /></td>
            <td><input type="text" name="people['.$counter.'][last_name]" value="'.$person['last_name'].'" /></td>
            <td><input type="text" name="people['.$counter.'][email]" value="'.$person['email'].'" /></td>
            <td><input type="text" name="people['.$counter.'][job_role]" value="'.$person['job_role'].'" /></td>
            <td><input type="checkbox" name="people['.$counter.'][delete]" value="1" /></td>
        </tr>
        ';
        $counter++;
        }
        ?>
        <tr>
            <td><input type="text" name="people[<?php echo $counter;?>][first_name]" placeholder="Add new..." /></td>
            <td><input type="text" name="people[<?php echo $counter;?>][last_name]" placeholder="Add new..." /></td>
            <td><input type="text" name="people[<?php echo $counter;?>][email]" placeholder="Add new..." /></td>
            <td><input type="text" name="people[<?php echo $counter;?>][job_role]" placeholder="Add new..." /></td>
        </tr>
    </table>
    <input type="submit" value="Submit!" />
</form>