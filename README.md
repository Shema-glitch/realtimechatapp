# Realtime Chat Application.
This is chat app can be linked with your customDB, <br> This means that you could use it as private or public chat
Not for a real private chat like a business or something private but for instance with your friends
were the chat can be destroyed. This is intended for temporally Database.

# How to link it with your customDB (Database SQL).
<h2>Create and name your db using SQL or manually.
<h3>You need 2 tables in your database</h3>
<h2>#1 Table(users)</h2>
  <table>
  <tr>
    <th>user_id</th>
    <th>unique_id</th>
    <th>fname</th>
    <th>lname</th>
    <th>email</th>
    <th>password</th>
    <th>img</th>
    <th>status</th>
  </tr>
</table>
<h2>#2 Table(messages)</h2>
  <table>
  <tr>
    <th>msg_id</th>
    <th>incoming_msg_id</th>
    <th>outgoing_msg_id</th>
    <th>msg</th>
  </tr>
</table>

# After creating those tables check if they are linked with the app
<h3 style="font-weight: 600;">If you're using XAMPP as your DBMS do this</h3>
<p>First copy the downloaded project to your directory htdocs, <br> then in your browser type "<span style="font-weight: 600">localhost:your port/folder name/config.php<br></span>" If it says <span style="font-weight: 600">"Database connected"</span></p>

<h2>I guess the app will work if it says Database connected</h2>
<p>If so, type again this address to create a new user <span style="font-weight: 600">localhost:xampp port/foldername/index.php</span> if you logged in recently type <span style="font-weight: 600">localhost:xampp port/foldername/login.php</span> or click on Login Now</p>

<p>You must have a little knowledge in db and sql</p>
