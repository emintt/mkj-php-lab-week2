<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $color = $_POST['color'];
  $size = $_POST['size'];
  $style = $_POST['style'];
  $styleString = '';

  if (in_array('bold', $style)) {
    $styleString .= 'font-weight: bold;';
  }

  if (in_array('italic', $style)) {
    $styleString .= 'font-style: italic;';
  }

  echo "<p style='color: $color; font-size: $size; $styleString '>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>";
}
?>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div>
            <!-- Color (radio buttons), options: red, green, blue -->
            <label for="red">Red</label>
            <input type="radio" id="red" name="color" value="red">
            <label for="green">Green</label>
            <input type="radio" id="green" name="color" value="green">
            <label for="blue">Blue</label>
            <input type="radio" id="blue" name="color" value="blue">
        </div>
        <div>
            <!-- Size (select), options: small, medium, large -->
            <label for="size">Size:</label>
            <select id="size" name="size">
                <option value="small">Small</option>
                <option value="medium">Medium</option>
                <option value="large">Large</option>
            </select>
        </div>
        <div>
            <!-- Font style (checkboxes), options: bold, italic -->
            <label for="bold">Bold</label>
            <input type="checkbox" id="bold" name="style[]" value="bold">
            <label for="italic">Italic</label>
            <input type="checkbox" id="italic" name="style[]" value="italic">
        </div>
        <button type="submit">Submit</button>
    </form>


<?php
//Create a form that has the following fields:
//Color (radio buttons), options: red, green, blue
//Size (select), options: small, medium, large
//Font style (checkboxes), options: bold, italic
//Submit button
//Create a script that processes the form data and generates some lorem ipsum text with the selected data as inline styles.
?>