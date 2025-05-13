import React, { useState, useEffect } from 'react';
import './App.css';
import PredictionTable from './components/PredictionTable';

function App() {
  const [predictions, setPredictions] = useState([]);
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState(null);

  useEffect(() => {
    const fetchPredictions = async () => {
      try {
        const response = await fetch('https://humanascase.onrender.com/predictions.php'); // Backend API endpoint
        if (!response.ok) {
          throw new Error(`HTTP error! status: ${response.status}`);
        }
        const data = await response.json();
        if (data.status === 'success') {
          setPredictions(data.data);
        } else {
          setError(data.message || 'Failed to fetch predictions.');
        }
      } catch (e) {
        setError(e.message || 'An error occurred while fetching predictions.');
      } finally {
        setLoading(false);
      }
    };

    fetchPredictions();
  }, []);

  if (loading) {
    return <div>Loading predictions...</div>;
  }

  if (error) {
    return <div>Error: {error}</div>;
  }

  return (
    <div className="App">
      <h1>User Login Predictions</h1>
      {predictions.length > 0 ? (
        <PredictionTable predictions={predictions} />
      ) : (
        <div>No prediction data available.</div>
      )}
    </div>
  );
}

export default App;