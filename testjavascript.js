async function testConnection() {
    const response = await fetch(
        'http://localhost:8000'
    );
    if (response.ok) {
        console.log('Server running!');
    } else {
        console.log('Connection failed');
    }
}

async function testGetUsers() {
    const response = await fetch(
        'http://localhost:8000/users'
    );
    const data = await response.json();
    
    
    if (data.success && 
        Array.isArray(data.data)) {
        console.log(' Structure OK');
    }
    
    
    if (data.count === data.data.length) {
        console.log(' Count matches');
    }
}

async function testCreateUser() {
    const newUser = {name: 'Teddy Roosevelt', age: '37', pastpurchase: 'lawnmower'};
    const response = await fetch('http://localhost:8000/users', {
            method: 'POST',
            header: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(newUser)
        }
    );

    const result = await response.json();

    if (response.status === 201 && result.data.name === newUser.name) {
        console.log('User created')
    }
}

async function testUpdateUser(id) {
    const updateData = {name: 'Andrew Jackson', age: '45', pastpurchase: 'vacuum'};
    const response = await fetch(
        'http://localhost:8000/users/${id}', {
            method: 'PUT',
            heder: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(updateData)
        }
    );
    const result = await response.json();

    if (result.data.name === updateData.name && result.data.age === updateData.age) {
        console.log('User updated');
    }
}

async function testDeleteUser(id) {
    const response = await fetch(
        'http://localhost:8000/users/${id}', {
            method: 'DELETE'
        }
    );
    if (response.ok) {
        const verifyResponse = await fetch(
            'http://localhost:8000/users/${id}'
        );
        if (verifyResponse.status === 404) {
            console.log('User deleted');
        }
    }
}

async function testDeleteUser(name) {
    const response = await fetch(
        'http://localhost:8000/users/${name}', {
            method: 'DELETE'
        }
    );
    if (response.ok) {
        const verifyResponse = await fetch(
            'http://localhost:8000/users/${name}'
        );
        if (verifyResponse.status === 404) {
            console.log('User deleted');
        }
    }
}

async function testDeleteUser(pastpurchase) {
    const response = await fetch(
        'http://localhost:8000/users/${pastpurchase}', {
            method: 'DELETE'
        }
    );
    if (response.ok) {
        const verifyResponse = await fetch(
            'http://localhost:8000/users/${pastpurchase}'
        );
        if (verifyResponse.status === 404) {
            console.log('User deleted');
        }
    }
}

async function testGetUsers(id) {
    const response = await fetch(
        'http://localhost:8000/users/${id}'
    );
    const data = await response.json();
    
    
    if (data.success && 
        Array.isArray(data.data)) {
        console.log(' Structure OK');
    }
    
    
    if (data.count === data.data.length) {
        console.log(' Count matches');
    }
}


async function testGetUsers(pastpurchase) {
    const response = await fetch(
        'http://localhost:8000/users/${pastpurchase}'
    );
    const data = await response.json();
    
    
    if (data.success && 
        Array.isArray(data.data)) {
        console.log(' Structure OK');
    }
    
    
    if (data.count === data.data.length) {
        console.log(' Count matches');
    }
}