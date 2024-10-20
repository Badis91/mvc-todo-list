<h2>Task List</h2>
<?php if (count($tasks) > 0): ?>
    <ul>
        <?php foreach ($tasks as $task): ?>
            <li>
                <strong><?php echo htmlspecialchars($task['title']); ?></strong>: <?php echo htmlspecialchars($task['description']); ?>
                <a href="/edit?id=<?php echo $task['id']; ?>">Edit</a>
                <a href="/delete?id=<?php echo $task['id']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
            </li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>No tasks found. <a href="/create">Add a new task</a>.</p>
<?php endif; ?>
