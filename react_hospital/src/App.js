import { BrowserRouter as Router, Routes, Route } from 'react-router-dom';
import Home from './Admin/Home';
import Register from './Admin/Register';
import Login from './Admin/Login';
import User from './Admin/User';
import { useState } from 'react';

const App = () => {
  const [isAuthenticated, setIsAuthenticated] = useState('');

  return (
    <Router>
      <div>
      <Routes>
        <Route path="/register" element={<Register />} />
        <Route path="/user" element={<User />} />
        <Route 
            path="/login" 
            element={<Login setIsAuthenticated={setIsAuthenticated} />} />
        <Route
            path="/"
            element={<Home isAuthenticated={isAuthenticated} />}
          />
      </Routes>
      </div>
    </Router>
  );
};

export default App;
