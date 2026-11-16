
<div>
  @if (Auth::check())
    <a href="/dashboard">Dashboard</a>
  @endif
  <a href="/home">Home</a>
  <a href="/contact">Contact</a>
  <a href="/gradebook">Gradebook</a>
  <a href="/stats">Stats</a>
  @if (Auth::check())
    <a href="/messages">Messages</a>
    @if (Auth::User()->role==1)
    <a href="/crud">Crud</a>
    @endif
    <form method="post" action="/logout" style="display:inline;">
      @csrf                
      <input type="submit" value="Logout">
    </form>    
  @endif





</div>
