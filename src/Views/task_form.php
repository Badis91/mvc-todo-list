<h2>Create a New Task</h2>
<form action="/create" method="POST">
    <label for="title">Title:</label>
    <input type="text" id="title" name="title" required>
    <label for="description">Description:</label>
    <textarea id="description" name="description" required></textarea>
    <button type="submit">Add Task</button>
</form>
