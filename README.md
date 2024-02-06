# Realtime Chat Application
This is chat app can be linked with your customDB, <br> This means that you could use it as private or public chat
Not for a real private chat like a business or something private but for instance<br>with your friend
Were the chat can be destroyed

# How to link it with your DB (Database SQL)
<h2>Create and name your db
<h3>You need 2 tables in your database</h3>
<ul>1 Table(users)
  <p>entities</p>
<li>user_id</li>
<li>unique_id</li>
<li>fname</li>
<li>lname</li>
<li>email</li>
<li>password</li>
<li>img</li>
<li>status</li>
</ul><br>
<ul>2 Table(messages)
<p>Entities of messages</p>
<li>msg_id</li>
<li>incoming_msg_id</li>
<li>outgoing_msg_id</li>
<li>msg</li>
</ul>

# After creating those tables check if they are linked with the app
<h3 style="font-weight: 600;">If you're using XAMPP as your DBMS do this</h3>


<p>You must have a little knowledge in db and sql</p>
