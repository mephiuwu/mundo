import React from 'react'

const Grilla = ({data}) => {
    console.log(data);
    return (
        <table className="table text-white mt-5">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Marca</th>
                    <th scope="col">Modelo</th>
                    <th scope="col">Bodega</th>
                </tr>
            </thead>
            <tbody>
                {
                    data.map( (element) => {
                        return (
                            <tr key={element.id}>
                                <th scope="row">{element.id}</th>
                                <td>{element.nombre}</td>
                                <td>{element.modelo.marca.nombre}</td>
                                <td>{element.modelo.nombre}</td>
                                <td>{element.bodega.nombre}</td>
                            </tr>
                        )
                    })
                }
            </tbody>
        </table>
    )
}

export default Grilla