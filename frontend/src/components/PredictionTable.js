import React from 'react';
import './PredictionTable.css';

function PredictionTable({ predictions }) {
  return (
    <table className="prediction-table">
      <thead>
        <tr>
          <th>User ID</th>
          <th>User Name</th>
          <th>Last Login</th>
          <th>Predicted (Avg. Interval)</th>
          <th>Predicted (Day/Hour - Recent)</th>
          <th>Predicted (Hour Frequency)</th>
        </tr>
      </thead>
      <tbody>
        {predictions.map(prediction => (
          <tr key={prediction.user_id}>
            <td>{prediction.user_id}</td>
            <td>{prediction.user_name}</td>
            <td>{prediction.last_login || 'N/A'}</td>
            <td>{prediction.prediction_avg_interval || 'N/A'}</td>
            <td>{prediction.prediction_day_hour_recent || 'N/A'}</td>
            <td>{prediction.prediction_hour_frequency || 'N/A'}</td>
          </tr>
        ))}
      </tbody>
    </table>
  );
}

export default PredictionTable;