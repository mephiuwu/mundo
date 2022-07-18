import React from 'react';

const Combobox = ({data, setState}) => {
  return (
    <div className="col-3">
        <select className="form-select" aria-label="Seleccione" onChange={ (e) => setState(e.target.value) }>
            <option value="">Seleccione</option>
            {
                data.map( (element) => (<option value={element.id} key={element.id}>{element.nombre}</option>))
            }
        </select>
	</div>
  )
}

export default Combobox