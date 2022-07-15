import { useEffect, useState } from 'react';
import './App.css';
import Combobox from './components/Combobox';
import axios from 'axios';
import Grilla from './components/Grilla';

function App() {
	const [bodegas, setBodegas] = useState([]);
	const [bodega, setBodega] = useState();
	
	const [marcas, setMarcas] = useState([])
	const [marca, setMarca] = useState();

	const [models, setModels] = useState([]);
	const [model, setModel] = useState();

	const [devices, setDevices] = useState([]);

	useEffect( () => {
		loadDevices();
	}, [bodega, marca, model]);

	useEffect( () => {
		loadModels();
	}, [marca]);

	useEffect( () => {
		loadDevices();
		loadWarehouse();
		loadBrand();
	}, []);

	const loadDevices = () => {
		axios.get(process.env.REACT_APP_BACKEND+'/getDispositivo', {
			params: {
				bodega,
				marca,
				model
			}
		})
		.then( (res) => {
			setDevices(res.data.data);
		})
		.catch( (err) => {
			console.log(err)
		})
	}

	const loadWarehouse = () => {
		axios.get(process.env.REACT_APP_BACKEND+'/getBodegas')
		.then( (res) => {
			setBodegas(res.data.data);
		})
		.catch( (err) => {
			console.log(err)
		})
	}

	const loadBrand = () => {
		axios.get(process.env.REACT_APP_BACKEND+'/getMarcas')
		.then( (res) => {
			setMarcas(res.data.data);
		})
		.catch( (err) => {
			console.log(err)
		})
	}

	const loadModels = () => {
		axios.get(process.env.REACT_APP_BACKEND+'/getModelofMarca', {
			params: {
				marca
			}
		})
		.then( (res) => {
			setModels(res.data.data);
		})
		.catch( (err) => {
			console.log(err)
		})
	}

	return (
		<div className="App">
			<div className="container mt-5">
				<div className='row'>
					<Combobox data={bodegas} setState={setBodega}/>
					<Combobox data={marcas} setState={setMarca}/>
					<Combobox data={models} setState={setModel}/>
					<Grilla data={devices}/>
				</div>
			</div>
		</div>
	);
}

export default App;