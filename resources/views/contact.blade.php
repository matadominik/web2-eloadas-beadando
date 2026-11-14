<x-mainpage>
    <!doctype html>
    <html> 
        <head> 
            <meta charset="UTF-8"> 
            <title>Laravel</title> 
        </head> 
        <body> 
            <form method="post" action="contact"> 
                @csrf                 
                <label>Full name:</label><input type="text" name="name" pattern="[A-Z,a-z, ]{8}[A-Z,a-z, ]*" 
                    required><br> 
                <label>E-mail:</label><input type="email" name="email" required><br> 
                <label>Message:</label><textarea class="input_message" name="inputMessage" placeholder="Your Message" minlength="10" maxlength="2000" required></textarea><br>
                <label></label><input type="submit" value="Send"> 
            </form>
        </body> 
    </html> 
</x-mainpage>