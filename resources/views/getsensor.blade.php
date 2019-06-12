<html>
<body>
<form action="/sensor" method="post">
    @csrf
    <input type="text" placeholder="device_id" name="device_id">
    <br>
    <input type="text" placeholder="location" name="location">
    <input type="submit">
</form>
</body>
</html>