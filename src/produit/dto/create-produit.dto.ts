import { ObjectId } from "mongoose"

export class CreateProduitDto {

    nomProduit : string
    description :string
    prix : Number
    image : string
    categorie :  ObjectId
}
