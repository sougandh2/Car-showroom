<html>
<head> <title> ADMIN GENERATION</title></head>
<body>
    <center>
        <h2>CREATE A NEW ADMIN </h2>
        <form name="ad" method="POST" action="{{ route('add_admin')}}">
            @csrf
            <input type="text" name="name" placeholder="ADMIN NAME"><br><br>
            
            <input type="text" name="user" placeholder="ADMIN USER NAME"><br><br>
           
            <input type="text" name="pass" placeholder="ADMIN PASSCODE"><br><br>
            @error('name')
            {{ $message }} <br>
            @enderror
            @error('user')
            {{ $message }}<br>
           @enderror
            @error('pass')
             {{ $message }}<br>
            @enderror
            <input type='submit' name='sub' value="CREATE">
        </form>
</body>
</html>