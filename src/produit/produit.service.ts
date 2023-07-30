import { Injectable, NotFoundException } from '@nestjs/common';
import { CreateProduitDto } from './dto/create-produit.dto';
import { UpdateProduitDto } from './dto/update-produit.dto';
import { InjectModel } from '@nestjs/mongoose';
import { produitModelName } from './produit.model-name';
import { Model, isValidObjectId } from 'mongoose';

@Injectable()
export class ProduitService {

  constructor(@InjectModel(produitModelName) private model : Model<CreateProduitDto>){}
  create(createProduitDto: CreateProduitDto) {
    return this.model.create(createProduitDto);
  }

  findAll() {
    return this.model.find();
  }
  findAllParCategorie(categorie : string){
    return this.model.find({categorie : categorie});
  }
  findOne(id: string) {
    if(isValidObjectId(id))
    return this.model.findOne({_id: id})
      throw NotFoundException
  }

  update(id: string, updateProduitDto: UpdateProduitDto) {
    if(isValidObjectId(id))
    return this.model.findOneAndUpdate({_id: id}, updateProduitDto, {new: true})
      throw NotFoundException
  }

  remove(id: string) {
    if(isValidObjectId(id))
     return  this.model.findOneAndDelete({_id: id})
    throw new NotFoundException  
  }

}
