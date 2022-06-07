import React from 'react';
import ReactDOM from 'react-dom/client';
import {
  BrowserRouter as Router,
  Routes,
  Route,
} from 'react-router-dom';

import './styles/reset.css';
import './styles/index.css';

import Header from './Components/Header';
import Home from './Pages/Home';
import Estimate from './Pages/Estimate';
import EstimateList from './Pages/EstimateList';
import NotFound from './Pages/ErrorsPage/NotFound';


const root = ReactDOM.createRoot(document.getElementById('root'));
root.render(
  <Router>
    <Header />

    <Routes>
      <Route path="/" element={<Home />} />
      <Route path="/estimations" element={<EstimateList />}/>
      <Route path="/estimation/:id" element={<Estimate />}/>
      <Route path="*" element={<NotFound />} />
    </Routes>
  </Router>
);
