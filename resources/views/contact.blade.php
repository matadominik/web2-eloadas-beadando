<x-mainpage>
    <!doctype html>
    <html> 
        <head> 
            <meta charset="UTF-8"> 
            <title>Laravel</title> 
        </head> 
        <body> 
            @if (session('success'))
                <p>{{ session('success') }}</p>
            @endif
            <form method="post" action="contact"> 
                @csrf                 
                <label>Full name:</label><input name="full_name" type="text" placeholder="Full Name" value="{{ old('full_name') }}" /><br>
                @error('full_name')
                    <strong>{{ $message }}</strong>
                @enderror <br>
                <label>E-mail:</label><input name="email_address" type="email" placeholder="Email Address" value="{{ old('email_address') }}" /><br> 
                @error('email_address')
                    <strong>{{ $message }}</strong>
                @enderror <br>
                <label>Message:</label><textarea class="message" name="message" placeholder="Message">{{ old('message') }}</textarea><br>
                @error('message')
                    <strong>{{ $message }}</strong>
                @enderror <br>
                <button class="btn_on-hover" type="submit">
                    Send
                </button>
            </form>
        </body> 
    </html> 
</x-mainpage>