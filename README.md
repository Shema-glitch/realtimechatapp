# Realtime Chat Application
This is chat app can be linked with your customDB, <br> This means that you could use it as private or public chat
Not for a real private chat like a business or something private but for instance<br>with your friend
Were the chat can be destroyed.

# How to link it with your DB (Database SQL)
<h2>Create and name your db
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
<h5>First copy the downloaded project to your directory htdocs, <br> then in your browser type "localhost:your port/folder name/config.php<br> If it says <span style="font-style: bold">"Database connected"</span></h5>

<p>You must have a little knowledge in db and sql</p>
