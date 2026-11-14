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
                <label>Full name:</label><input name="fullName" type="text" placeholder="Full Name" value="{{ old('fullName') }}" /><br>
                @error('name')
                    <strong>{{ $message }}</strong>
                @enderror <br>
                <label>E-mail:</label><input name="emailAddress" type="email" placeholder="Email Address" value="{{ old('emailAddress') }}" /><br> 
                @error('emailAddress')
                    <strong>{{ $message }}</strong>
                @enderror <br>
                <label>Message:</label><textarea class="inputMessage" name="inputMessage" placeholder="Message">{{ old('inputMessage') }}</textarea><br>
                @error('inputMessage')
                    <strong>{{ $message }}</strong>
                @enderror <br>
                <button class="btn_on-hover" type="submit">
                    Send
                </button>
            </form>
        </body> 
    </html> 
</x-mainpage>