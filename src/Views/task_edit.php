<h2>Edit Task</h2>
<form action="/edit?id=<?php echo $task['id']; ?>" method="POST">
    <label for="title">Title:</label>
    <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($task['title']); ?>" required>
    <label for="description">Description:</label>
    <textarea id="description" name="description" required><?php echo htmlspecialchars($task['description']); ?></textarea>
    <button type="submit">Update Task</button>
</form>
